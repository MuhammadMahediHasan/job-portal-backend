@extends('frontend.profile.job-seeker.index')
@section('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');


        .drop_box {
            margin: 10px 0;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 3px dotted #a3a3a3;
            border-radius: 5px;
        }

        .drop_box h4 {
            font-size: 16px;
            font-weight: 400;
            color: #2e2e2e;
        }

        .drop_box p {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #a3a3a3;
        }

        .upload-btn {
            text-decoration: none;
            background-color: #005af0;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            outline: none;
            transition: 0.3s;
        }

        .upload-btn:hover {
            text-decoration: none;
            background-color: #ffffff;
            color: #005af0;
            padding: 10px 20px;
            border: none;
            outline: 1px solid #010101;
        }

        .form input {
            margin: 10px 0;
            width: 100%;
            background-color: #e2e2e2;
            border: none;
            outline: none;
            padding: 12px 20px;
            border-radius: 4px;
        }

    </style>
@endsection
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="/job-seeker/profile/upload-resume"
                              method="POST"
                              id="upload-resume"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="drop_box">
                                <header>
                                    <h4>Select File here</h4>
                                </header>
                                <p>Files Supported: PDF</p>
                                <input type="file" name="resume" hidden accept=".doc,.docx,.pdf" id="file"
                                       style="display:none;">
                                <span class="file-name"></span>
                                <button type="button" class="upload-btn">Choose File</button>
                            </div>
                            <small class="text-danger"> {{ $errors->first('resume') }}</small>
                            <button class="btn btn-success float-end">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const dropArea = document.querySelector(".drop_box"),
            button = dropArea.querySelector("button"),
            dragText = dropArea.querySelector("header"),
            input = dropArea.querySelector("input");
        let file;
        var filename;

        button.onclick = () => {
            input.click();
        };

        input.addEventListener("change", function (e) {
            let fileName = e.target.files[0].name;
            $('.file-name').text(fileName);
        });

    </script>
@endsection
