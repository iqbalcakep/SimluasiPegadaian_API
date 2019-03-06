
<section>
	<div class="container-fluid">		
			<legend>Form title</legend>
			<div class="form-group">
				<label for="">Pinjaman</label>
				<input class="form-control" type="number" id="pinjaman_input" name="pinjaman" placeholder="pinjaman" value=''>
				<label for="">Tenor</label>
				<select  name="tenor" id="tenor_input" class="form-control" required="required" >
					<option value="12" selected>12 Bulan</option>
					<option value="18">18 Bulan</option>
					<option value="24">24 Bulan</option>
					<option value="36">36 Bulan</option>
				</select>
			</div>
			<button onclick="getAngsuran()" class="btn btn-primary">Submit</button>
		<p id="angsuran_out"></p>
	</div>
</section>
<script src="<?php echo base_url('') ?>/assets/js/vendor/jquery.min.js"></script>
<script>
	function findAngsuran()
	{
		var pinjaman = document.getElementById('pinjaman_input').value;
		var tenor = document.getElementById('tenor_input').value;
		
		document.getElementById("angsuran_out").innerHTML = hitungAngsuran(pinjaman,tenor); 

	}
	function getAngsuran(){
		var pinjaman = document.getElementById('pinjaman_input').value;
		var tenor = document.getElementById('tenor_input').value;
   		$.ajax({
		  	type: "POST",
		  	url: 'http://localhost/SimluasiPegadaian_API/index.php/reguler',
		  	data: {up:pinjaman, tenor:tenor},
		  	dataType: 'json',
		  	success : function(response){
	            alert(response.sewa+response.pinjaman);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
     		alert("some error");}
		});
	}

</script>