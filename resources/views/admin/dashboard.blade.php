<x-app-layout>
    <x-slot name="dashboard">
        <div class="wrapper">
        <x-navbar/>
        <x-sidebar/>
            <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif(Session::has('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('failed') }}
                    </div>
                    @endif
                    </div>
                </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>
        
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
                    Start creating your amazing application!
                </div>
                <div class="card-footer">
                    Footer
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
