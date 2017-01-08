rule sjsd2
{
strings: 
	$ = "@${'yMk'}=$ {\"_REQUEST\"};"
condition: any of them
}