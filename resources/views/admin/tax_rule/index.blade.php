@extends('../admin.layout')
@section('active14')
    active
@endsection
@section('main')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="my-auto mb-0 content-title">الألعاب</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قائمة
                    الألعاب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="pb-0 card-header">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="display nowrap " id="tableDashboard" data-page-length='50'
                            style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">نسبه الضريبه</th>
                                    <th class="wd-15p border-bottom-0">تاريخ الأنشاء</th>
                                    <th class="wd-15p border-bottom-0">تاريخ التعديل</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($tax_rule)
                                    <tr>
                                        <td>{{ $tax_rule->tax_rule }}%</td>
                                        <td>{{ $tax_rule->created_at }}</td>
                                        <td>{{ $tax_rule->updated_at }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-primary btn-md" data-effect="effect-scale"
                                                data-toggle="modal" href="#modaldemo8-{{ $tax_rule->id }}" title="تعديل">
                                                تعديل</a>
                                        </td>
                                    </tr>
                                    <!--  start effects delete user -->
                                    <div class="modal" id="modaldemo8-{{ $tax_rule->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">تعديل نسبه الضريبه</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="{{ route('tax_rules.update', $tax_rule->id) }}" method="post">
                                                    {{ method_field('patch') }}
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">نسبه الضريبه</label>
                                                            <input type="number" min="0"
                                                                value="{{ $tax_rule->tax_rule }}" name="tax_rule"
                                                                id="" class="form-control" placeholder="نسبه الضريبه"
                                                                aria-describedby="helpId" />
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">الغاء</button>
                                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Modal end delete  user -->
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>

    </div>

@endsection
@section('script')
@endsection
