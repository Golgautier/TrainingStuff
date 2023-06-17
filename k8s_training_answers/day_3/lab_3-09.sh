helm install nginx oci://ghcr.io/nginxinc/charts/nginx-ingress -n ingress-controler -f lab_3-09_nginx-values.yaml --create-namespace

helm install app-1 -n app-1 -f ../../k8s_training_answers/day_3/lab_3-09_values.yaml . --create-namespace

