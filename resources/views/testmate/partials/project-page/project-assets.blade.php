<div class="box">
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">

    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="col-sm-12">
                <div class="col-sm-6">
                  <h3 class="box-title">Project Assets</h3>
                </div>
                <div class="col-sm-6">
                 <form action="/projects/{{$projectCode}}" method="get" id="filterAsset">
                 <select class="form-control" id="assetTypeInProject">
                   <option value="All">All</option>
                   <option value="VIDEO">VIDEO</option>
                   <option value="DOCUMENT">DOCUMENT</option>
                 </select>
                 </form>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <input type="hidden" id="assetID" value="{{$assetID}}"/>
          <ul class="products-list product-list-in-box">

            <?php echo $filesHtml; ?>

          </ul>
        </div>
        <!-- /.box-body -->
      </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
