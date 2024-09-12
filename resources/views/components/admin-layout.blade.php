<div class="flex h-screen">
    <div class="min-w-40 bg-slate-100">
        <div class="flex flex-col">
            <a class="px-5 py-3" href="/admin">Dashboard</a>
            <a class="px-5 py-3" href="/admin/products">Products</a>
            <a class="px-5 py-3" href="/admin/orders">Orders</a>
            <a class="px-5 py-3" href="/admin/users">Users</a>
        </div>
    </div>
    <div class="w-full">{{$slot}}</div>
</div>