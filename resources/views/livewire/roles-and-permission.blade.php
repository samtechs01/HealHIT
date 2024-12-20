<div>
    <x-page-heading textA="Admin" textB="Control"/>
    <div>
        <x-auth-service title="Permissions" createUrl="/dashboard/admin/add-permission" showAllUrl="/dashboard/admin/permissions"/> 
        <x-auth-service title="Roles" createUrl="/dashboard/admin/add-role" showAllUrl="/dashboard/admin/roles"/> 
        <x-auth-service title="Admin Users" createUrl="/dashboard/admin/add-admin"/>
        <x-auth-service title="Role Assignment" createUrl="/dashboard/admin/assign-role" showAllUrl="/dashboard/admin/roles"/>
    </div>
  
</div>