<?php
   // exec('E:/users/NGSYS/importdonnees/importPRSNGSYS.bat');
   //shell_exec('E:/users/NGSYS/importdonnees/importPRSNGSYS.bat');

//$cmd = "E:/users/NGSYS/importdonnees/importPRSNGSYS.bat >/dev/null";
    //$cmd = "E:/users/NGSYS/importdonnees/importPRSNGSYS.bat";
    //$cmd = "E:/users/NGSYS/importdonnees/departement/importDPTNGSYS.bat";
    $cmd = "E:/users/NGSYS/importdonnees/departement/importDPTNGSYS.bat";
     echo shell_exec($cmd);
?>