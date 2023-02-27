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
                             <a href="{{ route('employee.export-csv') }}" class="btn btn-success btn-md"><i class="fas fa-download"> </i> CSV</a>
                             <a href="{{ route('employee.import-csv') }}" class="btn btn-warning btn-md" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-upload"> </i> CSV</a>
                             <a href="{{ route('employee.export-pdf') }}" class="btn btn-danger btn-md"><i class="fas fa-download"> </i> PDF</a>
                             
                           </div>
                        </div>

                        <div class="card">
                           <div class="card-body">
                             <table id="example2" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                 <th>Name</th>
                                 <th>Date of Birth</th>
                                 <th>Gender</th>
                                 <th>Address</th>
                                 <th>Job Title</th>
                                 <th>Division</th>
                                 <th>Religion</th>
                                 <th>Marital Status</th>
                                 <th>Nationality</th>
                                 <th>Image</th>
                               </tr>
                               </thead>
                               <tbody>
                               <tr>
                                 <td>{{ strtoupper($data->fullname) }}</td>
                                 <td>{{strtoupper($data->pob) }}, {{ date('d-m-Y', strtotime($data->dob)) }}</td>
                                 <td>{{ strtoupper($data->gender->name) }}</td>
                                 <td>{{ strtoupper($data->address) }}</td>
                                 <td>{{ strtoupper($data->position) }}</td>
                                 <td>{{ strtoupper($data->division) }}</td>
                                 <td>{{ strtoupper($data->religion->name) }}</td>
                                 <td>{{ strtoupper($data->maritalStatus->name) }}</td>
                                 <td>{{ strtoupper($data->nationality->name) }}</td>
                                 <td><a href="{{ url('storage/'.$data->image) }}"><img src="{{ url('storage/'.$data->image) }}" width="25" height="35" alt="user-img"></a></td>
                                </tr>
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
