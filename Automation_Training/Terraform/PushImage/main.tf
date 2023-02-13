resource "nutanix_image" "MyImage" {
  name        = "CENTOS_7"
  description = "Centos 7 (v2111)"
  source_uri  = "https://cloud.centos.org/altarch/7/images/CentOS-7-x86_64-GenericCloud-2111.qcow2c"
}