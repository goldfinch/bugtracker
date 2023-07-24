import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from "autoprefixer";
import { viteStaticCopy } from 'vite-plugin-static-copy'
import fs from 'fs';

const host = 'silverstripe-starter.lh';

export default defineConfig({

  server: {
      host,
      hmr: { host },
      https: {
          key: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.key`),
          cert: fs.readFileSync(`/Applications/MAMP/Library/OpenSSL/certs/${host}.crt`),
      },
  },

  // build: {
  //   emptyOutDir: true,
  //   outDir: '../dist',
  //   rollupOptions: {
  //     output: {
  //       entryFileNames: `dashpanel/assets/[name].js`,
  //       chunkFileNames: `dashpanel/assets/[name].js`,
  //       assetFileNames: `dashpanel/assets/[name].[ext]`
  //     }
  //   }
  // },

  plugins: [
      laravel({
          input: [
              'src/app.scss',
              'src/app.js',
          ],
          refresh: true,
      }),

      viteStaticCopy({
        targets: [
          // {
          //   src: './extra/images/*',
          //   dest: '../dist/dashpanel/assets/extra/images',
          // },
        ],
      })
  ],

    css: {
        postcss: {
            plugins: [
                autoprefixer,
            ],
        }
    },

});
