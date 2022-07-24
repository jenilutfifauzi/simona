<script type="text/javascript">
    $(document).ready(function() {
        $("#volume, #harga_satuan").keyup(function() {
            var harga  = $("#harga_satuan").val();
            var jumlah = $("#volume").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total_harga").val(total);
        });
    });
</script>
<script>
$(document).ready(function(){
  $('#tes1').change(function(){
      var data = $('#datepicker').val();
      var tanggal = new Date(data);
      var newDate = new Date(tanggal)
      var jumlah = $(this).val()
      newDate.setDate(newDate.getDate() + parseInt(jumlah));
      var dd = newDate.getDate();
      var mm = newDate.getMonth()+1;
      var y = newDate.getFullYear();
      var someFormattedDate = mm + '/' + dd + '/' + y;

      $('#hasiltes').val(someFormattedDate);
      console.log(someFormattedDate);
  });
});
</script>
