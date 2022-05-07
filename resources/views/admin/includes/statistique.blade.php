
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <a href="{{ url('admin/concours') }}" class="info-box">
        <span class="info-box-icon bg-info elevation-1">
        <i class="nav-icon fas fa-book"></i>
        </span>

        <div class="info-box-content" >
          <span class="info-box-text text-dark">
              Les Concours
          </span>
          <span class="info-box-number text-dark">
              {{ App\Models\Concour::count() }}
          </span>
        </div>
        <!-- /.info-box-content -->
      </a>
      <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <a href="{{ url('admin/etudiants') }}" class="info-box">
        <span class="info-box-icon bg-info elevation-1">
        <i class="nav-icon fas fa-book"></i>
        </span>

        <div class="info-box-content" >
          <span class="info-box-text text-dark">
              Les Etudiants
          </span>
          <span class="info-box-number text-dark">
              {{ App\Models\User::where('role', 'etudiant')->count() }}
          </span>
        </div>
        <!-- /.info-box-content -->
      </a>
      <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <a href="{{ route('admin.enseignants.index') }}" class="info-box">
        <span class="info-box-icon bg-info elevation-1">
        <i class="nav-icon fas fa-book"></i>
        </span>

        <div class="info-box-content" >
          <span class="info-box-text text-dark">
              Jury
          </span>
          <span class="info-box-number text-dark">
              {{ App\Models\User::where('role', 'jury')->count() }}
          </span>
        </div>
        <!-- /.info-box-content -->
      </a>
      <!-- /.info-box -->
    </div>
  <!-- /.col -->
</div>