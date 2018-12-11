<!DOCTYPE html>
<html>
	<body>
		<form action="form.asp" method="get">
			Nama kamu: <input type= "text" name="fname" size="20" />
			Pilih mobil favorit kamu: <input type="radio" name="cars"
			<%if cars="BMW" then response.write("checked")%>
			value="BMW">BMW</input>
			<input type="radio" name="cars"
			<%if cars="Kijang" then response.write("checked")%>
			value="Kijang">Kijang</input>
			<input type="radio" name="cars"
			<%if cars="Timor" then response.write("checked")%>
			value="Timor">Timor</input>
			<input type="submit" value="Submit" />
		</form>
		<%
			dim fname
			fname= Request.QueryString("fname")
			
			dim cars
			cars= Request.Form("cars")
			if fname<>"" Then
			response.write("Hallo "& fname & "!<br />")
			response.write("Bagai mana kabar kamu?")
			end if
			if cars<>"" then
			response.write("<p>Mobil favorit kamu adalah: "& cars & "</p>")
			end if
		%>
	</body>
</html>
