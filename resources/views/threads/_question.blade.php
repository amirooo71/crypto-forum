{{--Editing--}}
<div class="panel panel-default" v-if="editing">
    <div class="panel-heading">
        <div class="level">
            <input type="text" value="{{$thread->title}}" class="form-control">
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <textarea class="form-control" rows="10">
                {{$thread->body}}
             </textarea>
        </div>
    </div>
    <div class="panel-footer">
        <div class="level">
            <button class="btn btn-default mr-1" @click="editing = true" v-if="!editing">Edit</button>
            <button class="btn btn-primary mr-1" @click="">Update</button>
            <button class="btn btn-default" @click="editing = false">Cancel</button>
            @can('update',$thread)
                <form action="{{$thread->path()}}" method="POST" class="ml-a">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-default">Delete thread</button>
                </form>
            @endcan
        </div>
    </div>
</div>

{{--Viewing--}}
<div class="panel panel-default" v-else>
    <div class="panel-heading">
        <div class="level">
            <img src="{{$thread->owner->avatar_path}}" alt="{{$thread->owner->name}}"
                 width="25" height="25" class="mr-1">
            <span class="flex">
                <a href="/profiles/{{$thread->owner->name}}">{{$thread->owner->name}}</a>
                <i>posted : </i>
                {{$thread->title}}
            </span>
        </div>
    </div>
    <div class="panel-body">
        {{$thread->body}}
    </div>
    <div class="panel-footer">
        <button class="btn btn-default" @click="editing = true">Edit</button>
    </div>

</div>