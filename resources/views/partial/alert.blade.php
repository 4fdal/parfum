@if (session('danger'))
  <div id="alert" class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Note!!.. </h4>
    {{session('danger')}}
  </div>
@endif

@if (session('info'))
  <div id="alert" class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Note!!.. </h4>
    {{session('info')}}
  </div>
@endif

@if (session('warning'))
  <div id="alert" class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-warning"></i> Note!!.. </h4>
    {{session('warning')}}
  </div>
@endif

@if (session('success'))
  <div id="alert" class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Note!!.. </h4>
    {{session('success')}}
  </div>
@endif

<script type="text/javascript">
  setTimeout("alertDismiss()", 1500);
  function alertDismiss(){
    document.getElementById('alert').style.display="none";
  }
</script>
