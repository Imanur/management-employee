<x-app-layout>
    <x-slot name="dashboard">
        <div class="wrapper">
        <x-navbar/>
        <x-sidebar/>
            <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                    <h1>{{ $breadcrumb }}</h1>
                    @if (Session::has('success'))
                    <x-auth-session-status :success="session('success')" />
                    @elseif(Session::has('failed'))
                    <x-auth-validation-error :errors="session('errors')"/>
                    @endif
                    </div>
                </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $breadcrumb }} Table</h3>
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
                    <section class="content">
                        <div class="container-fluid">
                           <div class="col pr-5 pb-4">
                             <a href="{{ route('employee.create') }}" class="btn btn-primary btn-md"><i class="fas fa-plus"> </i> Society</a>
                             
                           </div>
                        </div>

                        <div class="card">
                           <div class="card-body">
                             <table id="example2" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>Name</th>
                                 <th>Job Title</th>
                                 <th>Division</th>
                                 <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                 @foreach($data as $k => $val)
                               <tr>
                                 <td>{{ ++$k }}</td>
                                 <td>{{ $val->fullname }}</td>
                                 <td>{{ $val->position }}</td>
                                 <td>{{ $val->division }}</td>
                                 <td>
                                   <a href="{{ url('admin/employee/'.$val->id) }}" class="badge badge-info btn-sm"><i class="far fa-eye"></i></a>
                                   <a href="{{ url('admin/employee/edit/'.$val->id) }}" class="badge badge-warning btn-sm"><i class="far fa-edit"></i></a>
                                   <a href="{{ url('admin/employee/delete/'.$val->id) }}" class="badge badge-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                 </td>
                               </tr>
                            @endforeach
                               </tbody>
                             </table>
                           </div>
                         </div>
                       </section>
                 
                    </div>
                </div>
            </section>
            </div>
        
            <footer class="main-footer">
            Copyright &copy; @php echo date('Y') @endphp  All rights reserved.
            </footer>
        </div>
    </x-slot>
</x-app-layout>
