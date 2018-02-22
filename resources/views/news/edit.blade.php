@extends('layouts.app')

@section('content')
  <hr>
  <h4>News bearbeiten</h4>
  <hr>

  @if (count($errors) > 0)
      <div class="callout alert">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form method="post" action="/admin/news/edit/{{ $news->id }}" enctype="multipart/form-data">
  <div class="row">
      <div class="col-md-9">

       {{ csrf_field() }}

      <div class="form-row">
        <div class="form-group col-md-12">
          <input type="text" name="news_title" id='news_title' class="form-control" value="{{$news->news_title}}" placeholder="Titel hier eingeben">
          <strong>Permalink: </strong><a href="{{ asset('news/') }}/{{$news->id}}" target="wp-preview-104">{{ asset('news/') }}/{{$news->id}}</a></span>
        </div>
      </div>
      <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
        <div class="widget-title">
          <h4><span>Inhalt</span></h4>
        </div>
        <div class="widget-body">
          <div class="form-group">
            <textarea name="news_content" rows="8" class="form-control">{{ $news->news_content }}</textarea>
          </div>
        </div>
      </div>
      <div id="seo_wrap" class="widget meta-boxes">
        <div class="widget-title">
          <h4><span>Search Engine Optimize</span></h4>
        </div>
        <div class="widget-body">
          <div class="form-group">
            <label for="seo_title" class="control-label">SEO Title</label>
            <input class="form-control" id="seo_title" placeholder="SEO Title" data-counter="120" name="seo_meta[seo_title]" type="text">
          </div>
        </div>
        <div class="widget-body">
          <div class="form-group">
             <label for="seo_description" class="control-label">SEO Description</label>
             <textarea class="form-control" id="seo_description" name="seo_meta[seo_description]">SEO Description</textarea>
          </div>
       </div>
       <div class="widget-body">
         <div class="form-group">
            <label for="seo_keywords" class="control-label">SEO Keywords</label>
            <input class="form-control" id="seo_keywords" placeholder="SEO Keywords" data-counter="120" name="seo_meta[seo_keywords]" type="text">
         </div>
      </div>
     </div>
    </div>
    <div class="col-md-3 right-sidebar">
      <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
          <div class="widget-title">
            <h4>
              <span>Publish</span>
            </h4>
          </div>
          <div class="widget-body">
            <div class="btn-set">
              @if ($news->news_status === 'publish')
                 <button type="submit" id="save" name="submit" value="save" class="btn btn-info">
                   <i class="fa fa-save"></i> Save
                 </button>
               @else
                 <button type="submit" id="publish" d="updateNews" name="updateNews" name="publish" value="publish" class="btn btn-success">
                   <i class="fa fa-check-circle"></i> Save &amp; Edit
                 </button>
                 <button type="submit" id="publish" name="publish" value="publish" class="btn btn-info">
                   <i class="fa fa-save"></i> Publish
                 </button>
               @endif

            </div>
          </div>
      </div>
      <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
        <div class="widget-title">
          <h4>
            <span>Status</span>
          </h4>
        </div>
        <div class="widget-body">
            <select class="form-control select-full select2-hidden-accessible" name="status">
              @if($news->news_status == 'publish')
                <option value="0">Entwurf</option>
                <option value="1" selected>Veröffentlicht</option>
              @else
                <option value="0" selected>Entwurf</option>
                <option value="1">Veröffentlicht</option>
              @endif
            </select>
        </div>
      </div>
      <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
        <div class="widget-title">
          <h4>
            <span>Kategorien</span>
          </h4>
        </div>
        <div class="widget-body">
          <ul>
            @foreach ($news->categories as $newsCat)
              <li value="1">
                <input type="checkbox" id="category-{{$newsCat->id}}" checked value="{{$newsCat->id}}" name="categories[]">
                <span class="text">{{$newsCat->name}}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="widget meta-boxes form-actions form-actions-default action-horizontal">
        <div class="widget-title">
          <h4>
            <span>Beitragsbild</span>
          </h4>
        </div>
        <div class="widget-body">
          <div class="image-box">
          @isset($news->news_thumbnail)
            <input type="hidden" id="image" name="image" value="{{'uploads/' . $news->news_thumbnail}}" class="image-data">
            <div class="preview-image-wrapper">
                <img src="{{ asset('uploads/' . $news->news_thumbnail)}}" alt="preview image" class="preview_image img-fluid">
                <a class="btn_remove_image" title="Remove image">
                    <i class="fa fa-times"></i>
                </a>
                <div class="image-box-actions">
                    <a href="#" class="btn_gallery">
                      Beitragsbild entfernen
                    </a>
                </div>
            </div>
          @endisset
          @empty($news->news_thumbnail)
            <div class="image-box-actions">
                <a href="#" class="btn_gallery" id="select-image">
                  Beitragsbild festlegen
                </a>
            </div>
            <input type="hidden" id="image" name="image" value="" class="image-data">
          @endempty
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
