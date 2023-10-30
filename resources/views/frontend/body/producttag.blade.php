<div class="sidebar-widget product-tag wow fadeInUp">
  <h3 class="section-title">Product tags</h3>
  <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list"> 
        @php
            session()->get('lang')=='bn' ? $alltag = $allTagsbn : $alltag= $allTagsen;
        @endphp
        @foreach ($alltag as $tag)
        <a class="item {{ $name==$tag ? 'active':'' }}" title="{{ $tag }}" href="{{ url('search-product/tag/'.$tag) }}">{{ $tag }}</a>
        @endforeach
        {{-- 
          <a class="item active" title="Vest" href="category.html">Vest</a> <a --}}
      </div>
      <!-- /.tag-list -->
  </div>
  <!-- /.sidebar-widget-body -->
</div>