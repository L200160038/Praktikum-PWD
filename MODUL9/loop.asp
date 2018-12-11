<!DOCTYPE html>
<html>
		<%
			dim i
			for i = 1 to 6
				response.write("<h" & i & ">Heading " & i & "<h/" & i & ">")
				next
		%>
	</body>
</html>