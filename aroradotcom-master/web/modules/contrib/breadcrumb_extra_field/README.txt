
Breadcrumb Extra Field allows you to print breadcrumb between fields.

Download and place in /modules/[contrib/]breadcrumb_extra_field
Navigate to administer >> modules and enable Breadcrumb extra field.

Configuration:

In order to enable the extra field into an entity, is needed to configure
the module administration form:
URL to configuration form:
  "/admin/config/system/breadcrumb-extra-field".

"Administer breadcrumb extra field" permission is used to ensure the
correct access. Be sure it's correctly configured in People >> Permissions.

After configuration just clear cache and set the extra field visibility into
the desired view mode.

IMPORTANT: Limited to these entity types:
node, user, taxonomy term, comment and bean.
If you need to implement into other entity please create a feature request
issue.
