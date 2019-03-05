
<section>
	<div class="container-fluid">		
		<form action="" method="POST" role="form">
			<legend>Form title</legend>
			<div class="form-group">
				<label for="">Pinjaman</label>
				<input onkeypress="findAngsuran()" class="form-control" type="number" id="pinjaman_input" name="pinjaman" placeholder="pinjaman" value='0'>
				<label for="">Tenor</label>
				<select onchange="findAngsuran()" name="tenor" id="tenor_input" class="form-control" required="required" >
					<option value="12" selected>12 Bulan</option>
					<option value="18">18 Bulan</option>
					<option value="24">24 Bulan</option>
					<option value="36">36 Bulan</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<p id="angsuran_out"></p>
	</div>
</section>
<script>
	function findAngsuran()
	{
		var pinjaman = document.getElementById('pinjaman_input').value;
		var tenor = document.getElementById('tenor_input').value;
		
		document.getElementById("angsuran_out").innerHTML = hitungAngsuran(pinjaman,tenor); 

	}
	function hitungAngsuran(pinjaman, tenor)
	{
		var total = '';
		if(pinjaman<=10000000)
		{
			var sewaModal = pinjaman * 0.0125;
			var totalTagihan = (parseInt(sewaModal) + parseInt(pinjaman));
			var total = totalTagihan/tenor;

	
		}
		else if(pinjaman>=10000001 && pinjaman <= 50000000)
		{
			var total = (pinjaman + (pinjaman * 0.0115))/tenor;
	
		}
		else if(pinjaman>=50000001 && pinjaman <= 100000000)
		{
			var total = (pinjaman + (pinjaman * 0.105))/tenor;
	
		}
		else if(pinjaman>=100000001)
		{
			var total = (pinjaman + (pinjaman * 0.01))/tenor;
	
		}
		
		return total;
	}
</script>