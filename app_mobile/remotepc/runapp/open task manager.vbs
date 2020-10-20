Option Explicit
Dim Application
Application = "%windir%\system32\Taskmgr.exe"
Call RunThis(Application)
'*********************************************************************************
Sub RunThis(Application)
    Dim Ws,Result
    Set Ws = CreateObject("WScript.Shell")
    Result = Ws.Run(DblQuote(Application),1,False)
End Sub
'*********************************************************************************
Function DblQuote(Str)
    DblQuote = Chr(34) & Str & Chr(34)
End Function