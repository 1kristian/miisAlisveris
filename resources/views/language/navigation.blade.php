<ul class="nav navbar-nav navbar-right">

<li >
      {!! Form::open(['method' => 'POST', 'route' => 'changelocale', 'class' => 'menu_language_change' ]) !!}
          {!! Form::select(
          'locale',
                  [
                'tr' => 'Türkce',
                'de' => 'Deutsch',
                'en' => 'English'
                  ],
          \Session::get('locale'),
          [
            'id'       => 'locale',
            'class'    => 'form-control languageSwitch',
            'required' => 'required',
            'onchange' => 'this.form.submit()',
          ]
          ) !!}
         <small class="text-danger">{{ $errors->first('locale') }}</small>
      {!! Form::close() !!}
</li>
</ul>
