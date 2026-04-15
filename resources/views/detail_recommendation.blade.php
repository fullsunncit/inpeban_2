<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #F6FFF8;
            font-family: 'Poppins', sans-serif;
        }

        /* 🔹 Title */
        .title {
            color: #6B9080;
            font-weight: 700;
        }

        /* 🔹 Table Detail */
        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .detail-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #d9e6e3;
            vertical-align: top;
        }

        .detail-table td:first-child {
            color: #6B9080;
            font-weight: 700;
            width: 120px;
        }

        .detail-table td:last-child {
            color: #385a4e;
            font-weight: 600;
        }

        /* 🔹 Rating */
        .rating {
            font-size: 50px;
            color: #6B9080;
            font-weight: bold;
        }

        /* 🔹 Back Button */
        .back-btn {
            position: absolute;
            left: 20px;
            top: 20px;
            font-size: 30px;
            text-decoration: none;
            color: #6B9080;
        }

        /* 🔹 Image */
        .detail-img {
            width: 100%;
            max-width: 400px;
            height: auto;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 10px;
        }

        /* 🔹 Responsive */
        @media (max-width: 768px) {

            .title {
                font-size: 28px;
            }

            .rating {
                font-size: 40px;
            }

            .detail-table td {
                font-size: 14px;
                padding: 8px;
            }

            .back-btn {
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {

            .rating {
                font-size: 32px;
            }

            .detail-table td:first-child {
                width: 90px;
            }
        }

        .row {
            row-gap: 20px;
        }
    </style>
</head>

<body>

    <!-- 🔹 BACK -->
    <a href="/#rekomendasi" class="back-btn">←</a>

    <div class="container py-5">

        <!-- 🔹 TITLE -->
        <h1 class="text-center title mb-5">Detail Page</h1>

        <div class="row align-items-center">

            <!-- 🔹 LEFT (IMAGE) -->
            <div class="col-md-6 text-center">
                <img src="{{ trim($item['image']) }}" class="detail-img">
            </div>

            <!-- 🔹 RIGHT -->
            <div class="col-md-6">

                <!-- ⭐ Rating -->
                <div class="d-flex align-items-center mb-3">
                    <span class="rating">⭐</span>
                    <span class="rating ms-3">{{ $item['rating'] }}</span>
                </div>

                <!-- 🔹 Detail -->
                <table class="detail-table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $item['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $item['category'] }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $item['phone'] }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $item['address'] }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</body>

</html>
