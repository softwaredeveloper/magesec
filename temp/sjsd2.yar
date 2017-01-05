rule sjsd2
{meta:
author = "Magemojo"
    strings: 
	$ = "@${'yMk'}=$ {\"_REQUEST\"};"
condition: any of them
}