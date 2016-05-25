
{!! Form::open(array('route' => $route, 'method' => $method)) !!}

 <div class="form-group">
    <label for="parent_id">Category</label>
     <?php
    function renderNode($node, $id) {

      $selected = '';
      if($node->id === $id)
      $selected = 'selected';

      if( $node->isLeaf() ) {
        $html =  '
        <option value="' . $node->id . '" '.$selected.'>
        '.str_repeat('---', $node->depth ).' ' . $node->name . '
        </option>';
        return $html;

      } else {
        $html = '
        <option value=' . $node->id . '" '.$selected.'>
        '.str_repeat('---', $node->depth ).' ' . $node->name . '
        </option>';

        foreach($node->children as $child)
          $html .= renderNode($child, $id);

      }
      return $html;
    }
     ?>
     <select name="parent_id" class="form-control">
       <option value="">Main Category</option>
       @foreach($categories as $Allcategories)
         {!! renderNode($Allcategories, isset($category->parent_id) ? $category->parent_id : null) !!}
       @endforeach
     </select>

  </div>
<div class="form-group">
    <label for="name">Name</label>
     <input type="text" name="name" value="{{ old('name',  isset($category->name) ? $category->name : null) }}" class="form-control" />
 </div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" value="{{ old('slug',  isset($category->slug) ? $category->slug : null) }}" class="form-control">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="editor" class="form-control" rows="3">{{ old('content',  isset($category->content) ? $category->content : null) }}</textarea>
</div>
<div class="form-group">
  <label for="image">Image</label>
  <div class="row">
    <div class="col-md-3">
    @if(isset($category->image))
    <img class="img-responsive" src="{{ url('', $category->image) }}">
    @endif
   </div>
   <div class="col-md-9">
     <input type="hidden" id="image" name="image" value="{{ old('image',  isset($category->image) ? $category->image : null) }}" class="popup_selector form-control">
     <a href="" class="popup_selector btn btn-info" data-inputid="image">Change / Select Image</a>
   </div>
</div>
</div>

<button type="submit" class="btn btn-success">Submit</button>
