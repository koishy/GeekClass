@extends('layouts.app')

@section('content')
    <br>
    <h2 style="margin-top: -25px">Изменить событие</h2>
    <form method="POST">
        {{ csrf_field() }}
        <div class = "form-group required">
            <label>Тип события</label>
            <div class="radio">
                <div><input type="radio" name="type" value="Внешнее" checked>Внешнее</div>
                <div><input type="radio" name="type" value="Внутреннее">Внутреннее</div>
            </div>
        </div>

        <div class = "form-group required">
            <label>Название события</label>
            <input type="text" name="name" class="form-control" value="{{$event->name}}"required>
        </div>

        <div class = "form-group required">
            <label>Краткое описание события</label>
            <input name="short_text" class="form-control" value="{{$event->short_text}}" required>
        </div>

        <div class = "form-group required">
            <label>Описание события</label>
            <textarea name="text" class="form-control" required>{{$event->text}}</textarea>
        </div>

        <div class = "form-group required">
            <label>Дата проведения мероприятия</label>
            <input type="text" name="date" class="date form-control" value="{{$event->date}}" required>
        </div>

        <div class = "form-group required">
            <label>Место проведения мероприятия</label>
            <input name="location" class="form-control" value="{{$event->location}}" required>
        </div>

        <div class = "form-group">
            <label>Ограничение на кол-во студентов</label>
            <input name="max_people" class="form-control" type="number" value="{{$event->max_people}}">
        </div>

        <div class = "form-group">
            <label>Сайт мероприятия</label>
            <input name="site" class="form-control" value="{{$event->site}}">
        </div>

        <div class = "form-group">
            <label>Что должны знать студенты</label>
            <input name="skills" class="form-control" value="{{$event->skills}}">
        </div>

        <div class="form-group row">
            @foreach($tags as $tag)
                @if($tag->id !=1)
                        <div class="col-md-3">
                            <div class="card" style="width: 100%; margin-bottom: 10px;">
                                <div class="card-body">
                                    <div class="form-check " style="margin-left: 10px;">
                                        <input type="checkbox" name="tags[]" class="form-check-input"
                                               @if($event->tags->contains($tag->id)) checked @endif
                                               value="{{$tag->id}}" id="{{$tag->id}}">
                                        <label for="{{$tag->id}}" class="form-check-label">{{$tag->name}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
        </div>
        <div class="row" style="margin-left:0px">
            <input type="submit" value="Изменить" class = "btn btn-success">
            <a href="{{url('insider/events/'.$event->id.'/delete')}}" role="button" class="btn btn-danger" style="margin-left: 10px;"  onclick="return confirm('Вы уверены?')">Удалить</a>
        </div>
    </form>
    <br>
@endsection