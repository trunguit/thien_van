<div class="modal fade" data-reveal id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="quoteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Báo Giá Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="quoteForm" method="POST" action="{{ route('frontend.quotes.store') }}">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="mb-3">Thông Tin Sản Phẩm</h2>
                            <img alt="Hình ảnh sản phẩm" id="productImage" class="img-fluid mb-3"
                                src="https://storage.googleapis.com/a1aa/image/fl4-UrINJ4IIoHnE0poAFI6eFoNP3JFHNkNjE6Po-hs.jpg"
                                style="width: 200px; height: 200px;" />
                            <div class="form-group mb-3">
                                <label for="productName"><strong>Tên Sản Phẩm:</strong></label>
                                <p id="productName"></p>
                                <input type="hidden" name="product_id" id="productId" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="quantity"><strong>Số Lượng:</strong></label>
                                <input type="number" class="form-control" name="qty" id="quantity" min="1" value="10">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <h2 class="mb-3">Thông Tin Khách Hàng</h2>
                            <div class="form-group mb-3">
                                <label for="customerName"><strong>Tên Khách Hàng:</strong></label>
                                <input type="text" class="form-control" name="customer_name" id="customerName"
                                    placeholder="Nhập tên khách hàng">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phoneNumber"><strong>Số Điện Thoại:</strong></label>
                                <input type="tel" name="customer_phone" class="form-control" id="phoneNumber"
                                    placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address"><strong>Địa Chỉ:</strong></label>
                                <textarea name="customer_address" class="form-control" id="address" rows="2" placeholder="Nhập địa chỉ"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Gửi Yêu Cầu</button>
                </div>
            </form>
        </div>
    </div>
</div>
