<div class="box">
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">

  <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Latest Uploaded Assets</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="products-list product-list-in-box">
            <?php $i=0; ?>
            @foreach($assetList as $key=>$asset)
                @if($i == 5)
                     <?php break; ?>
                @endif
              <li class="item asset-DOCUMENT">
                <a href="/projects/{{$asset->url}}" target="_blank" class=" asset-item" id="6" asset-type="{{$asset->assetType}}">
                <div class="asset-image product-DOCUMENT"></div>
                <div class="product-info">
                    <span class="product-title">{{$asset->name}}</span>
                    <span class="label  pull-right">{{$asset->status}}</span>
                    <span class="product-description">{{$asset->description}}</span>
                    <span class="product-description asset-date"><strong>Upload Date: </strong>{{$asset->uploadDate}}</span>
                </div>
                </a>
              </li>
                <?php $i++; ?>
            @endforeach
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
</div>
<!-- /.box-body -->
</div>
