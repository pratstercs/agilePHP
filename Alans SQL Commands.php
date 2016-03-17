<?php 
//Selects All modules for a given Staff Members userID in this year (2016)
"Select module.ModuleID, module.ModuleName from module inner join lecturer on module.ModuleID =lecturer.moduleID inner join staff on lecturer.StaffID=staff.StaffID inner join user on staff.UserID= user.UserID where module.ModuleYear= '2016' && user.userID = 6;"

//Returns classes that are currently runninng in room. with supplied qrcode (including 10min before) that student is enrolled in (e.StudentID & r.QRCode)
"Select c.ClassID from class c inner join room r on c.Room_ID=r.RoomID inner join module m on m.ModuleID=c.ModuleID inner join enrolement e on m.ModuleID=e.ModuleID where e.StudentID = 1 && r.QRCode = "UniqueCode" && c.ClassDate=CURDATE() && c.Start_Time-1000 < CURTIME() && c.End_Time > curtime();"

//
""

?>