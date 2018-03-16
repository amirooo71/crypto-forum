{{--Editing--}}
<div class="panel panel-default" v-if="editing">
    <div class="panel-heading">
        <div class="level">
            <input type="text" class="form-control" v-model="form.title">
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <wysiwyg v-model="form.body" :value="form.body"></wysiwyg>
            {{--<textarea class="form-control" rows="10" v-model="form.body">--}}
            </textarea>
        </div>
    </div>
    <div class="panel-footer">
        <div class="level">
            <button class="btn btn-default mr-1" @click="editing = true" v-if="!editing">Edit</button>
            <button class="btn btn-primary mr-1" @click="update">Update</button>
            <button class="btn btn-default" @click="resetForm">Cancel</button>
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
                <span v-text="form.title"></span>
            </span>
        </div>
    </div>
    <div class="panel-body" v-html="form.body"></div>
    <div class="panel-footer" v-if="authorize('owns',thread)">
        <button class="btn btn-default" @click="editing = true">Edit</button>
    </div>
</div>