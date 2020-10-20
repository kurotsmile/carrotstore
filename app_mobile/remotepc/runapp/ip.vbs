Option Explicit

Dim WshShell

set WshShell = WScript.CreateObject("WScript.Shell")
WshShell.run("cmd.exe")
WScript.Sleep 5000
WshShell.SendKeys "ipconfig" 
WshShell.SendKeys("{Enter}")
WScript.Sleep 5000