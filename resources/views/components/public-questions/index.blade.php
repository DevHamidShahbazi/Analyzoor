@if($data->isNotEmpty())

    <div class="col-12 text-start p-2">

        <span class="fs-4 font-weight-bold mb-2 text-primary">
            سوالات متداول
        </span>

        <div class="accordion mt-4" id="accordionExample">
            @foreach($data as $key => $question)
                <div class="border border-secondary border-1 rounded-2 border-opacity-50 my-2 ">
                    <h5 class="accordion-header rounded-2" id="heading{{$key}}">
                        <button dir="rtl" class="accordion-button collapsed font-weight-bold rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                            {{$question->title}}
                        </button>
                    </h5>
                    <div id="collapse{{$key}}" class="accordion-collapse collapse " aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            {{$question->description}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endif
