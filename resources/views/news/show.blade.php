@extends('layouts.app')

@section('content')
  <hr>
<a class="btn btn-primary mb-3 p-2" href="/admin/news/new">Create new News Post</a>
  <table class="table table-light">
    <thead>
      <tr role="row">
        <th width="10px" class="text-left no-sort sorting_asc" rowspan="1" colspan="1" style="width: 40px;" aria-label="">
          <div class="checkbox checkbox-primary">
            <div class="checker">
              <span>
                <input type="checkbox" class="group-checkable" data-set=".dataTable .checkboxes">
              </span>
            </div>
          </div>
        </th>
        <th width="20px" rowspan="1" colspan="1" style="width: 20px;">ID</th>
        <th rowspan="1" colspan="1" style="width: 67px;">Image</th>
        <th class="text-left" rowspan="1" colspan="1">Name</th>
        <th width="100px" class="sorting" rowspan="1" colspan="1">Created At</th>
        <th width="100px" class="column-select-search sorting"  rowspan="1" colspan="1">Status</th>
        <th width="134px" class="text-center" rowspan="1" colspan="1" style="width: 158px;">Operations</th>
      </tr>
    </thead>
    <tbody>
    @foreach($news as $n)
      <tr role="row" class="odd">
        <td class="text-left no-sort sorting_1">
          <div class="text-left">
            <div class="checkbox checkbox-primary table-checkbox">
              <div class="checker">
                <span>
                  <input type="checkbox" class="checkboxes" name="id[]" value="{{$n->id}}">
                </span>
              </div>
            </div>
          </div>
        </td>
        <td>{{$n->id}}</td>
        <td>
          <img src="{{ asset('uploads/' . $n->news_thumbnail)}}" width="70" alt="thumbnail">
        </td>
        <td class="text-left">
          <a class="text-left text-justify" href="/admin/news/edit/{{$n->id}}" title="{{ $n->news_title }}">{{ $n->news_title }}</a>
        </td>
        <td class="" style="width: 250px;">{{ $n->created_at->format('Y-m-d') }}</td>
        <td class="column-select-search">
          @if ($n->news_status == 'publish')
            <span class="label-success status-label bg-success text-light" style="padding: 3px 5px;">{{$n->news_status}}</span>
          @elseif ($n->news_status == 'draft')
            <span class="label-success status-label bg-danger text-light" style="padding: 3px 5px;">{{$n->news_status}}</span>
          @endif
        </td>
        <td class=" text-center">
          <div class="table-actions">
            <a href="/admin/news/edit/{{$n->id}}" class="btn btn-icon btn-sm btn-primary tip" data-original-title="Edit">
              <i class="fa fa-edit"></i>
            </a>
            <a class="btn btn-icon btn-sm btn-danger deleteDialog tip">
                <i class="fa fa-trash-o"></i>
            </a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
