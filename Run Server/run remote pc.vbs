Option Explicit
Dim ObjFSO, MsgValue,scriptdir
Set ObjFSO = CreateObject("Scripting.FileSystemObject")

scriptdir = ObjFSO.GetParentFolderName(WScript.ScriptFullName)

msgValue = msgBox("Run server remote Pc ?",vbYesNo,"Run server")
If msgValue = vbYes Then
ObjFSO.CopyFile scriptdir&"\config_remotepc\httpd.conf","C:\xampp\apache\conf\httpd.conf"
End If
