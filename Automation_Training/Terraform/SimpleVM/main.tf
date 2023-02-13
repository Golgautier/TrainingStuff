data "nutanix_subnet" "subnet" {
  subnet_name = var.nutanix_network
}

data "nutanix_cluster" "cluster" {
  name = var.nutanix_cluster
}

data "nutanix_image" "image" {
  image_name = var.nutanix_image
}

resource "nutanix_virtual_machine" "machine" {
  name = "test-machine"
  cluster_uuid = data.nutanix_cluster.cluster.id

  num_vcpus_per_socket = 1
  num_sockets          = 4
  memory_size_mib      = 6096

  # guest_customization_cloud_init_user_data = base64encode(file("cloud-init/simple.yaml"))

  nic_list {
    subnet_uuid = data.nutanix_subnet.subnet.id
  }

  disk_list {
    data_source_reference = {
      kind = "image"
      uuid = data.nutanix_image.image.id
    }

    disk_size_mib = 50720

    device_properties {
      device_type = "DISK"

      disk_address = {
        adapter_type = "SCSI"
        device_index = 0
      }
    }
  }
}

output "machine_ip" {
  value     = nutanix_virtual_machine.machine.nic_list_status.0.ip_endpoint_list.0.ip
  sensitive = false
}