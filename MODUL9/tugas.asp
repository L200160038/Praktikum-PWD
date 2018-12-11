<html>
		<body>
              <%
               action = lcase(request("action"))
               select case action
               case "jumlahkan"
               total = cint(request("angka1")) + cint(request("angka2"))
               response.write "Hasil penjumlahanya adalah: " & total
               end select
               %>

              <form method="post" action="tugas.asp">
                Nilai A adalah: <input type=text name="angka1" value=""><br>
                Nilai B adalah: <input type=text name="angka2" value=""><br>
             <input type=submit value='Jumlahkan'>
            <input type=hidden name="action" value="jumlahkan">
            </form>
		</body>
</html>