{!! Form::open(array('route' => $route, 'method' => $method)) !!}
       <div class="form-group">
           <label for="parent_id">Categories</label>
            <?php
           function renderNode($node, $product_categories) {
             $selected ='';

             if (isset($product_categories) and in_array($node->id, $product_categories)) {
                  $selected = "selected";
              }

             if( $node->isLeaf() ) {
               $html =  '
               <option value="' . $node->id . '" '.$selected.'>
               '.str_repeat('&not;', $node->depth ).' ' . $node->name . '
               </option>';
               return $html;

             } else {
               $html = '
               <option value=' . $node->id . '" '.$selected.'>
               '.str_repeat('&not;', $node->depth ).' ' . $node->name . '
               </option>';

               foreach($node->children as $child)
                 $html .= renderNode($child, $product_categories);

             }
             return $html;
           }
            ?>
            <select name="categories" id="multiSelect" multiple="multiple" class="form-control">
              <option value="">Main Category</option>
                   @foreach($categories as $category)
                      {!! renderNode($category, isset($product_categories) ? $product_categories : null) !!}
                 @endforeach
             </select>
          </div>
       <div class="form-group">
           <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name',  isset($product->name) ? $product->name : null) }}" class="form-control" />
        </div>
       <div class="form-group">
           <label for="slug">Slug</label>
           <input type="text" name="slug" value="{{ old('slug',  isset($product->slug) ? $product->slug : null) }}" class="form-control">
       </div>
       <div class="form-group">
           <label for="content">Content</label>
           <textarea name="content" id="editor" class="form-control" rows="3">{{ old('content',  isset($product->content) ? $product->content : null) }}</textarea>
       </div>
       <div class="form-group">
         <label for="image">Image</label>
         <div class="row">
           <div class="col-md-3">
           @if(isset($product->image))
           <img class="img-responsive" src="{{ url('', $product->image) }}">
           @endif
          </div>

          <div class="col-md-9">
            <input type="hidden" id="image" name="image" value="{{ old('image',  isset($product->image) ? $product->image : null) }}" class="popup_selector form-control">
            <a href="" class="popup_selector btn btn-info" data-inputid="image">Change / Select Image</a>
          </div>
       </div>
       </div>
       <div class="form-group">
           <label for="slug">Price</label>
           <input type="text" name="price" value="{{ old('slug',  isset($product->price) ? $product->price : null) }}" class="form-control">
       </div>

 


<button type="submit" class="btn btn-success">Submit</button>
