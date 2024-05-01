<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Mới</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Thêm CSS tùy chỉnh -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .form-control {
            border-radius: 5px;
            border-color: #ced4da;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Cập nhật sản phẩm</h2>
            <form action="{{ route('product.postupdateProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name" required class="form-control" value="{{ $product->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" id="price" name="price"  value="{{ $product->price }}"required class="form-control">
                </div>

                <div class="form-group">
                    <label for="stock_quantity">Số Lượng Kho</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" value="{{ $product->stock_quantity }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Danh Mục sản phẩm</label>
                    <select id="category_id" name="category_id" required class="form-control">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($product->category_id == $category['id']) echo 'selected'; ?>>
                                <?php echo $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>                

                <div class="form-group">
                    <label for="image1">Hình Ảnh 1</label>
                    <input type="file" id="image1" name="image1" accept="image/*" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="image2">Hình Ảnh 2</label>
                    <input type="file" id="image2" name="image2" accept="image/*" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="image3">Hình Ảnh 3</label>
                    <input type="file" id="image3" name="image3" accept="image/*" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Thêm</button>
            </form>
        </div>
    </div>

    <!-- Thêm Bootstrap JavaScript (nếu cần) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
