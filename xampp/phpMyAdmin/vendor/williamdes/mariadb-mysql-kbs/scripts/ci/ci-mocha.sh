#!/bin/bash
cd $(dirname $0)/../../
echo "Running in : $(pwd)"
npm run images
npm run report-coverage
