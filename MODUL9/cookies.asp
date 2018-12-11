<!DOCTYPE html>
<%
	dim numvisits
	response.write("Numvisits").expires= date+365
	numvisits= request.cookies("NumVisits")
	
	if numvisits= "" then
	respons.cookies("NumVisits")=1
	response.write("Selamat datang! Ini adalah pertama kali kamu mengunjungi halaman ini.")
	else
	response.cookies("NumVisits")= numvisits+1
	response.write("Kamu sudah mengunjungi")
	response.write("halaman ini "& numvisits)
	if numvisits=1 then
	response.write "kali sebelumnya!"
	else
	response.write "Kali sebelumnya!"
	end if
	end if
%>
<html>
<body>
</body>
</html>
