using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class UpdateDBcontextChangeForeginKeyToWithMany : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE",
                column: "ASSETCODE");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SPEC_ASSETCODE",
                table: "TRN_DTL_SPEC",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_ASSETCODE",
                table: "TRN_DTL_PICTURE",
                column: "ASSETCODE",
                unique: true);
        }
    }
}
