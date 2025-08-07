<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    @if (isset($dataCategory) && $dataCategory !== null)
    <h4>Tabel data category</h4>
    @endif
    @if (isset($dataArtikel) && $dataArtikel!== null)
    <h4>Tabel data article</h4>
    @endif
    <table class="table">
        <thead>
            <tr>
                @if (isset($dataCategory) && $dataCategory !== null)
                <th>ID Category</th>
                <th>Category Name</th>
                <th>Action</th>
                @endif
                @if (isset($dataArtikel) && $dataArtikel !== null)
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>jumlah views</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @if(isset($dataArtikel) && $dataArtikel !== null)
            @foreach($dataArtikel as $dataArticel)
            <tr>
                <td>
                    {{$dataArticel['title_artikel']}}
                </td>
                <td>
                    {{$dataArticel['id_category']}}
                </td>
                <td>
                    {{$dataArticel['created_at']}}
                </td>
                <td>
                    {{$dataArticel['click_count']}}
                </td>
            </tr>
            @endforeach
            @endif

            @if(isset($dataCategory) && $dataCategory !== null)
            @foreach($dataCategory as $CategoryData)
            <tr>
                <td>
                    {{$CategoryData['id']}}
                </td>
                <td>
                    {{$CategoryData['Category_name']}}
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>