helm repo add https://metallb.github.io/metallb

helm install metallb metallb/metallb -n metallb --create-namespace

kubectl apply -n metallb -f - <<EOF
apiVersion: metallb.io/v1beta1
kind: IPAddressPool
metadata:
  name: first-pool
spec:
  addresses:
  - 10.38.212.200-10.38.212.200
---
apiVersion: metallb.io/v1beta1
kind: L2Advertisement
metadata:
  name: first-pool
EOF

 helm upgrade myapp -n helm-test -f ../../k8s_training_answers/day_3/lab_3-08_values.yaml .
 