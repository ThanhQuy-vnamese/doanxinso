@if ($errors->any())
                  @if ($errors->has('tendau'))
                      <li style="color:#b30000">{{ $errors->first('tendau') }}</li>
                  @elseif($errors->has('tencuoi'))
                      <li style="color:#b30000">{{ $errors->first('tencuoi') }}</li>
                  @elseif($errors->has('ngay'))
                      <li style="color:#b30000">{{ $errors->first('ngay') }}</li>
                  @elseif($errors->has('thoigian'))
                      <li style="color:#b30000">{{ $errors->first('thoigian') }}</li>
                  @elseif($errors->has('dienthoai'))
                      <li style="color:#b30000">{{ $errors->first('dienthoai') }}</li>
                  @elseif($errors->has('tinnhan'))
                      <li style="color:#b30000">{{ $errors->first('tinnhan') }}</li>
                  @endif                               
            @endif