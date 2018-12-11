<html>
	<body>
		<%
			dim famname(5),i
			famname(0)="Eko"
			famname(1)="Siti"
			famname(2)="Anto"
			famname(3)="Paijo"
			famname(4)="Ana"
			famname(5)="Suparman"
			
			for i = 0 to 5
			response.write(famname(i) & "<br />")
			next
		%>
	</body>
</html>
