@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Все пользователи</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Аватар</th>
                                <th scope="col">Логин</th>
                                <th scope="col">Email</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($active as $key => $actives)
                            <tr>
                                <td>#{{ $actives->id }}</td>
                                <td class="ava-user"><img @if($actives->avatar) src="/uploads/avatars/{{ $actives->avatar }}" @else src="/images/artist.png" @endif alt=""></td>
                                <td>{{ $actives->login }}</td>
                                <td>{{ $actives->email }}</td>
                                <td class="status-item">@if($actives->status == 'artist') <span class="green-back">Артист</span> @else <span class="orange-back">Организатор @endif</td>
                                <td><a href="/mpadmin/users/{{ $actives->id }}" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-times"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/users/{{ $actives->id }}/delete">Удалить пользователя</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-tag"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/users/{{ $actives->id }}/status/artist">Артист</a>
                                                <a class="dropdown-item" href="/mpadmin/users/{{ $actives->id }}/status/organizator">Организатор</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$active->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
