@extends('common.layouts')

<!-- 想替换模板中的哪个模块，用section选中就可以了 -->
@section('content')

    @include('common.message')

    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">学生列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->sex($student->sex) }}</td>
                    <td>{{ date('Y-m-d', $student->created_at) }}</td>
                    <td>
                        <a href="{{ url('student/detail', ['id' => $student->id]) }}">详情</a>
                        <a href="{{ url('student/update', ['id' => $student->id]) }}">修改</a>
                        <a href="{{ url('student/delete', ['id' => $student->id]) }}"
                                onclick="if (confirm('确定要删除吗？') == false) return false;">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div class="pull-right">
            {{ $students->render() }}
        </div>

    </div>
@stop