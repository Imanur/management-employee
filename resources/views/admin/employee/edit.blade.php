<x-app-layout>
    <x-slot name="dashboard">
        <div class="wrapper">
        <x-navbar/>
        <x-sidebar/>

        <div class="content-wrapper pl-3 pr-3">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                  </div>
                  @if(Session::has('failed'))
                  <div class="alert alert-danger" role="alert">
                    {{ Session::get('failed') }}
                  </div>
                  @endif
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
                    </ol>
                  </div>
                </div>
              </div>
            </section>
        
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{ $breadcrumb }}  Form</h3>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="{{ url('admin/employee/edit/'.$data->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group row">
                          <div class="col-sm-6">
                              <label for="fullname">Fullname</label>
                              <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" placeholder="Fullname" value="{{ $data->fullname }}">
                              @error('fullname')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
      
                          <div class="col-sm-6">
                              <label for="gender_id">Gender</label>
                              <select class="custom-select @error('gender_id') is-invalid @enderror" name="gender_id" id="gender_id" value="{{ $data->gender->name }}">
                                  <option value="">--Choose Gender--</option>
                                  @foreach($gender as $g)
                                  <option value="{{ $g->id }}" {{ old('gender_id') == $g->id ? 'selected' : null }}>{{ strtoupper($g->name) }}</option>
                                  @endforeach
                              </select> 
                              @error('gender')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <div class="col-sm-6">
                              <label for="pob">Birth Of Place</label>
                              <input type="text" class="form-control @error('pob') is-invalid @enderror" name="pob" id="pob" placeholder="Birth Of Place" value="{{ $data->pob }}">
                              @error('pob')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
                          <div class="col-sm-6">
                              <label for="dob">Birth Of Date</label>
                              <input type="text" class="custom-select datepicker @error('pob') is-invalid @enderror" name="dob" id="dob" placeholder="Birth Of Date"  autocomplete="off" value="{{ $data->dob }}">
                              @error('dob')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
      
                        </div>
      
                        <div class="form-group row">
                          <div class="col-sm-6">
                              <label for="position">Job Title</label>
                              <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" placeholder="Job Title" value="{{ $data->position }}">
                              @error('position')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                          </div>
      
                          <div class="col-sm-6">
                            <label for="division">Division</label>
                            <input type="text" class="form-control @error('division') is-invalid @enderror" name="division" id="division" placeholder="Division" value="{{ $data->division }}">
                            @error('division')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">  
                            <label for="religion_id">Religion</label>
                              <select class="custom-select @error('profession') is-invalid @enderror" name="religion_id" id="religion_id">
                                  <option value="">--Choose Religion--</option>
                                  @foreach($religion as $r)
                                  <option value="{{ $r->id }}" {{ old('religion_id') == $r->id ? 'selected' : null }}>{{ strtoupper($r->name) }}</option>
                                  @endforeach
                              </select>         
                              @error('religion_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror     
                          </div>
      
                          <div class="col-sm-6">
                              <label for="marital_status_id">Marital Status</label>
                              <select class="custom-select @error('marital_status_id') is-invalid @enderror" name="marital_status_id" id="marital_status_id">
                                  <option value="">--Choose Marital Status--</option>
                                  @foreach($marry as $m)
                                  <option value="{{ $m->id }}" {{ old('marital_status_id') == $m->id ? 'selected' : null }}>{{ strtoupper($m->name) }}</option>
                                  @endforeach
                              </select>            
                              @error('marital_status_id')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror 
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6">
                              <label for="address">Address</label>
                              <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address">{{ $data->address }}</textarea> 
                              @error('address')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror    
                          </div>
      
                          <div class="col-sm-6">
                            <label for="nationality_id">Nationality</label>
                                  <select class="custom-select @error('nationality_id') is-invalid @enderror" name="nationality_id" id="nationality_id">
                                      <option value="">--Choose Nationality--</option>
                                      @foreach($nationality as $n)
                                      <option value="{{ $n->id }}" {{ old('nationality_id') == $n->id ? 'selected' : null }}>{{ strtoupper($n->name) }}</option>
                                      @endforeach
                                  </select>
                                  @error('nationality_id')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-6">
                              <label for="image">Image</label>
                                <div class="input-group">
                                  <label for="image" class="form-label"></label>
                                  <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImg()" value="{{ $data->image }}">
                                  <img class="img-preview img-fluid col-sm-3" alt="image-user">
                                      @error('image')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                      @enderror 
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="footer">
                                  <button type="submit" class="btn btn-primary btn-md bt">Add</button>
                              </div>
                            </div>
                          </div>
                          
                          <style>
                            .footer{
                              height: 50px;
                              text-align: start;
                              transform: 50px;
                              padding-top: 30px
                            }
                          </style>
                    
                    </form>
                </div>
              </div>
        
            </section>
          </div>
        
          <footer class="main-footer">
          
            Copyright &copy; @php echo date('Y') @endphp  All rights reserved.
      
          </footer>
       
        </div>
      
        <script>
          function previewImg(){
              const image = document.querySelector('#image')
              const imgPreview = document.querySelector('.img-preview')
              imgPreview.style.display = 'block'
              const readImage = new FileReader()
              readImage.readAsDataURL(image.files[0])
              readImage.onload = function(e){
                  imgPreview.src = e.target.result
              }
          }
        </script>
    </x-slot>    
</x-app-layout>    