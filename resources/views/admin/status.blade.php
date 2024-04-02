@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المدير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الحالة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mg-b-0">STRIPED ROWS</h4>
                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                </div>
                                <p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>state</th>
                                            <th>site</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0; ?>
                                        @foreach($status as $state)
                                            <?php $i++ ?>
                                            <tr>
                                                <th >{{$i}}</th>
                                                <td>{{ $state->status }}</td>
                                                <td>

                                                    <a class="btn btn-primary btn-sm modal-effect"
                                                       data-name="{{ $state->status }}" data-pro_id="{{ $state->id }}"
                                                        data-toggle="modal"
                                                       data-target="#edit_Product"><i class="las la-pen"></i></a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{ $state->id }}" data-section_name="{{ $state->status }}" data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>




                                                </td>

                                            </tr>


                                        @endforeach

                                        </tbody>
                                    </table>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>

                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                  type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="status/destroy" method="post">
                                    {{method_field('delete')}}
                                    @csrf
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                                    </div>
                                    <div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn btn-danger">تاكيد</button>
                                        </div>
                                </form>
                            </div>
                        </div>




                        <!-- row closed -->
                    </div>

                    <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل منتج</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action='{{route('status.update','kjho')}}' method="post">
                                    {{ method_field('patch') }}
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="title">اسم المنتج :</label>

                                            <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                                            <input type="text" class="form-control" name="product_name" id="product_name">
                                        </div>

                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                        <select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2"  >
                                            @foreach ($status as $state)
                                                <option>{{ $state->state }}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-group">
                                            <label for="des">ملاحظات :</label>
                                            <textarea name="description" cols="20" rows="5" id='description'
                                                      class="form-control"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
